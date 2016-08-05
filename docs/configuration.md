# Zend Navigation
`@ToDo: Needs more testing on the actual functionality`
# Zend Paginator
`@ToDo: Needs more testing on the actual functionality`
# Parsedown

 - `breaks` - Should line separators be converted one-to-one or multiples should be treated as one `<br>` (**Default**: `false`)
Treating single line breaks as new lines and add `<br>` or not
 - `escape` - Escape HTML in content or not (**Default**: `true`)
Pretty much the effect of `htmlspecialchars()`
 - `linkUrls` - Should URLs get automatically converted to links or should stay as plain text (**Default**: `true`)
Example: `https://google.com` will become `<a href="https://google.com">google.com</a>`
 - `appendUrlHost` - Append the hostname of the URL at the end of the text (helpful for user generated content) (**Default**: `true`)
Example: `[Google](https://google.com)` will become `<a href="https://google.com">Google (google.com)</a>`
So to properly provide this configuration you should have the following file:
```
<?php

return [
    'markdown' => [
        'breaks' => false,
        'escape' => true,
        'linkUrls' => true,
        'appendUrlHost' => true
    ]
];
```

You are good to go!
