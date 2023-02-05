# Python


## Expressions
- Operators


## Statements



## Commentaries
```py
# single line comment

""" Multiline comments
    work well
"""
```


## Data types

### Mutable

> The values can be modified after creation

Boolean (bool)
:   boolean logic value
    ```py
    a = True
    b = False
    ```

Integer numbers (int)
:   real numbers without any fractional part.
    ```py
    x = 5
    ```

Floating point numbers (float)
:   real numbers with fractional part is specified by decimal point.
    ```py
    y = 5.0
    ```

Complex numbers (complex)
:   complex numbers are written in the form *a + b*_j_
    ```py
    z = 5 + 5j
    ```

List (list)
:   It's ordered sequence of one or more types of values
:   ```py
    xs = [1, 25, 5.25, 'Name', True]

    # access element
    xs[0] # -> 1
    xs[3] # -> 'Name'
    xs[-1] # -> True
    ```

Set (set)
:   It's unordered collection of unique elements.
    ```py
    xs = {1, 25, 5.25, 'Name', True, 25}
    xs # -> {1, 25, 5.25, 'Name', True}
    ```

Dictionary (dict)
:   It's unordered collection of pair values (key -> value)
    ```py
    kv = {"Name": "Sergey", "Points": 250}

    # access value
    kv["Name"] # -> 'Sergey'
    ```



### Immutable

> The values can't be modified after creation

String (str)
:   ```py
    x1 = 'it\'s string'

    x2 = "it's string too"

    x3 = '''it\'s string too,
        but multiline'''

    # access characters via indexes [index]
    x3[0] # -> 'i'
    x3[2] # -> "'"
    x3[-1] # -> 'e'
    ```

Tuple (tuple)
:   It's ordered sequence of one or more types of values
:   ```py
    xs = (1, 25, 5.25, 'Name', True)

    # access element
    xs[0] # -> 1
    xs[3] # -> 'Name'
    xs[-1] # -> True
    ```



## Operators

> parentheses can enforce precedence like in Math.

### Math

Base
:   ```py
    1 + 2 # -> 3
    3 - 1 # -> 2
    2 * 3 # -> 6
    6 / 3 # -> 2.0 Always float
    ```

Division rounds down
:   ```py
    5 // 3 # -> 1
    -5 // 3 # -> -2
    ```

Modulo
:   ```py
    7 % 3 # -> 1
    -7 % 3 # -> 2
    ```

Exponentiation
:   ```py
    2 ** 3 # -> 8
    ```


### Logic

Comparison
:   ```py
    1 == 1 # -> True
    1 != 1 # -> False
    1 > 2 # -> False
    1 < 2 # -> True
    2 >= 2 # -> True
    2 <= 2 # -> True
    2 >= 3 # -> False
    ```
    > use with boolean operatos to build complex expression

Boolean
:   ```py
    not True # -> False
    True and False # -> False
    True or False # -> True
    ```

Identity
:   ```py
    a is b # -> True
    a is not b # -> False
    ```

### Bitwise
:   ```py
    7 & 21 # 0000 0111 & 0001 0101 -> 0000 0101 (5)
    7 | 21 # -> 0001 0111 (23)
    7 ^ 21 # -> 0001 0010 (18)
    ~7 # -> 0000 1000 (-8)
    7 << 2 # -> 0001 1100 (28)
    7 >> 2 # -> 0000 0001 (1)
    ```


### Concatenation

String
:   ```py
    'I do' + ' my best' # -> 'I do my best'
    # or
    'I do' + ' my best' # -> 'I do my best'
    ```

List/tuple
:   ```py
    [1, 2, 3] + [3, 4] # -> [1, 2, 3, 3, 4]
    (1, 2, 3) + (3, 4) # -> (1, 2, 3, 3, 4)
    ```


### Check for existence

Value in list/tuple/set
:   ```py
    2 in [1, 2, 3] # -> True
    2 in (1, 2, 3) # -> True
    2 in {1, 2, 3} # -> True
    2 not in {1, 2, 3} # -> False
    ```

Key in dictionary
:   ```py
    'x' in {'x': 2, 'y': 5} # -> True
    'x' not in {'x': 2, 'y': 5} # -> False
    ```


### Set
Intersection
:   ```py
    {1, 2, 3, 4, 5} & {3, 4, 5, 6} # -> {3, 4, 5}
    ```

Union
:   ```py
    {1, 2, 3, 4, 5} | {3, 4, 5, 6} # -> {1, 2, 3, 4, 5, 6}
    ```

Difference
:   ```py
    {1, 2, 3, 4, 5} - {3, 4, 5, 6} # -> {1, 2}
    # or symmetric
    {1, 2, 3, 4, 5} ^ {3, 4, 5, 6} # -> {1, 2, 6}
    ```

Superset
:   ```py
    {1, 2, 3, 4, 5} >= {3, 4, 5} # -> True, the right set is superset of left
    # opposite
    {1, 2, 3, 4, 5} <= {3, 4, 5} # -> False
    ```

