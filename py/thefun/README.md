# Python

```py
# single line comment

""" Multiline comments
    work well
"""
```

## Operations

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

String concatenation
:   ```py
    'I do' + ' my best' # -> 'I do my best'
    # or
    'I do' + ' my best' # -> 'I do my best'
    ```

List/tuple concatenation
:   ```py
    [1, 2, 3] + [3, 4] # -> [1, 2, 3, 3, 4]
    (1, 2, 3) + (3, 4) # -> (1, 2, 3, 3, 4)
    ```

Check for existence value in list/tuple/set
:   ```py
    2 in [1, 2, 3] # -> True
    2 in (1, 2, 3) # -> True
    2 in {1, 2, 3} # -> True
    ```

Check for existence key in dictionary
:   ```py
    'x' in {'x': 2, 'y': 5} # -> True
    ```

Set intersection
:   ```py
    {1, 2, 3, 4, 5} & {3, 4, 5, 6} # -> {3, 4, 5}
    ```

Set union
:   ```py
    {1, 2, 3, 4, 5} | {3, 4, 5, 6} # -> {1, 2, 3, 4, 5, 6}
    ```

Set difference
:   ```py
    {1, 2, 3, 4, 5} - {3, 4, 5, 6} # -> {1, 2}
    # or symmetric
    {1, 2, 3, 4, 5} ^ {3, 4, 5, 6} # -> {1, 2, 6}
    ```

Superset checking
:   ```py
    {1, 2, 3, 4, 5} >= {3, 4, 5} # -> True
    # opposite
    {1, 2, 3, 4, 5} <= {3, 4, 5} # -> False
    ```

Identity
:   ```py
    x is y # -> True, if x and y refer to the same memory
    ```


