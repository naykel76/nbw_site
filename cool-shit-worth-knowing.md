    // Splits the string by commas.
    // Trims whitespace from each value.
    // Filters out empty values.
    // Removes duplicates.

    $values = "Apples, Bananas, Oranges, Apples";
    $arrayWithUnique = array_unique(array_filter(array_map('trim', explode(',', $values))));


Get a list of all installed VS Code extensions.

```bash
code --list-extensions
```



You can quickly add all your currently installed extensions to your `extensions.json` recommendations with these steps:

Export your extensions list
Open the VS Code terminal and run:

This will print all installed extensions in the format publisher.extension.

Copy the output
Select and copy the list from the terminal.

Format for JSON
Paste the list into your extensions.json under "recommendations", adding quotes and commas.
Example:

Tip:
You can use multi-cursor editing or a text editor "find and replace" to quickly add quotes and commas to each line.

This will recommend all your current extensions to anyone opening the workspace.