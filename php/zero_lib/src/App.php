<?php

namespace app;

class App
{
    static function run(array $config)
    {
        /*
         * TODO: auto doc
         */
        $route = static function (array $routes, string $s) {
            $s = '/' . trim($s, '/');

            if (isset($routes[$s])) return $routes[$s];

            uksort(
                $routes,
                static fn ($a, $b) => strlen($a) > strlen($b) ? -1 : 1
            );

            foreach ($routes as $k => $v) {
                if (strpos($k, ':') != false)
                    $k = preg_replace('/:(\w+)/', "(?'$1'\w+)", $k);

                preg_match("@^{$k}$@", $s, $match);

                if (!empty($match))
                    return [
                        'name' => $v,
                        'params' => array_filter(
                            $match,
                            static fn ($_k) => !is_numeric($_k),
                            ARRAY_FILTER_USE_KEY
                        )
                    ];
            }

            throw \Exception('UNKNOWN_ROUTE');
        };

        $connect = static function ($params) {
            static $h;
            if (empty($h))
                $h = new \PDO(
                    'mysql:host=smart_mariadb;dbname=sid',
                    'root',
                    'toor',
                    [
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    ]
                );

            return $h;
        };

        $cols = static function ($xs, $src) {
            return [
                'op' => 'select',
                // TODO: support alias
                'cols' => array_map(
                    static fn ($x) => "{$src}.{$x}",
                    $xs
                ),
                'src' => $src
            ];
        };

        $join = static function ($src1, $src2, $keys) {
            array_push($src1['cols'], ...$src2['cols']);
            $src1['join'][$src2['src']] = "{$src2['src']}.{$keys[1]}={$src1['src']}.{$keys[0]}";

            return $src1;
        };

        $execQuery = static function ($q) use ($connect) {
            $h = $connect([]);

            $pkIncluded = true;
            $pkFields = $h->prepare(<<<SQL
            SHOW KEYS FROM {$q['src']} WHERE Key_name='PRIMARY'
            SQL);
            $pkFields->execute();
            $pkField = $q['src'] . '.' . $pkFields->fetch()['Column_name'];

            if (!in_array($pkField, $q['cols'])) {
                $pkIncluded = false;
                array_unshift($q['cols'], $pkField);
            }

            $cols = implode(',', $q['cols']);

            $sql = <<<SQL
            SELECT {$cols} FROM {$q['src']}
            SQL;

            if (isset($q['join'])) {
                foreach ($q['join'] as $joinT => $on) {
                    $sql .= <<<SQL
                     INNER JOIN {$joinT} ON {$on}
                    SQL;
                }
            }

            $x = $h->prepare($sql);
            $x->execute();

            $res = $x->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_NAMED);
            $xs = [];
            foreach ($res as $pk => $vals) {
                if (count($vals) == 1) {
                    if ($pkIncluded)
                        $vals[0]['id'] = $pk;
                    array_push($xs, $vals[0]);
                } else {
                    // handle one-to-one, one-to-many
                    $vals = array_reduce(
                        $vals,
                        static function ($a, $row) {
                            if (empty($a))
                                return $row;

                            foreach ($row as $k => $v) {
                                if (is_array($a[$k]))
                                    array_push($a[$k], $v);
                                else if ($a[$k] != $v) {
                                    $a[$k] = [$a[$k]];
                                    array_push($a[$k], $v);
                                }
                            }

                            return $a;
                        },
                        []
                    );
                    if ($pkIncluded)
                        $vals['id'] = $pk;
                    array_push($xs, $vals);
                }
            }

            return $xs;
        };

        try {
            echo "<pre>"; var_dump(
                $execQuery(
                    $join(
                        $cols(['id', 'name'], 'users'),
                        $cols(['brand'], 'cars'),
                        ['id', 'user_id']
                    )
                )
            ); die;
            echo $route(
                [
                    '/' => 'base',
                    '/.*/:id/edit' => 'edit anything with',
                    '/host/:name/staff/:id/edit' => 'edit',
                    '/host/:name/staff/:id' => 'show',
                    '/host/staff/add' => 'add'
                ],
                '/user/2/edit'
            )['name'];
        } catch (\Throwable $e) {
            throw $e;
            /* echo "<pre>"; var_dump($e->getMessage()); die; */
        }
        exit(0);
    }
}
