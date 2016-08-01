# Zend Navigation
`@ToDo: Needs more testing on the actual functionality`
# Zend Paginator
`@ToDo: Needs more testing on the actual functionality`
# Parsedown

 - `breaks` - Should line separators be converted one-to-one or multiples should be treated as one `<br>` (**Default**: `false`)
 - `escape` - Should markdown be escaped or not (**Default**: `true`)
 - `linkUrls` - Should URLs get automatically converted to links or should stay as plain text (**Default**: `true`)

So to properly provide this configuration you should have the following file:
```
<?php

return [
    'markdown' => [
        'breaks' => false,
        'escape' => true,
        'linkUrls' => true
    ]
];
```

You are good to go!
