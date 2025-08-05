# Typescript Quick Reference
<!-- TOC -->

- [Setting Up](#setting-up)
- [Interface](#interface)
- [Type Examples](#type-examples)
    - [Event Types](#event-types)

<!-- /TOC -->

```bash +torchlight-bash
npm install typescript --save-dev
```

```bash +torchlight-bash
npm install typescript --save-dev
```


<a id="markdown-setting-up" name="setting-up"></a>

## Setting Up

<code-first-col></code-first-col>
| Command                           | Description                                                |
| --------------------------------- | ---------------------------------------------------------- |
| npm install typescript --save-dev |                                                            |
| npm install -g typescript         | Install globally to access `tsc` anywhere in your terminal |
| npx tsc --init                    | Create boilerplate `tsconfig.json` file                    |
|                                   |                                                            |
|                                   |                                                            |
|                                   |                                                            |
|                                   |                                                            |


<a id="markdown-interface" name="interface"></a>

## Interface

```ts
interface LabeledValue {
  label: string;
}

function printLabel(labeledObj: LabeledValue) {
  console.log(labeledObj.label);
}

let myObj = { size: 10, label: "Size 10 Object" };
printLabel(myObj);
```


<a id="markdown-type-examples" name="type-examples"></a>

## Type Examples

<a id="markdown-event-types" name="event-types"></a>

### Event Types

```ts
document.addEventListener('keydown', handleKeyPress);

function handleKeyPress(event: KeyboardEvent) { }
```

```ts
// Event type for a click event handler
type ClickEventHandler = (event: MouseEvent) => void;

// Example of attaching an event listener
const button = document.getElementById('myButton');
if (button) {
    const handleClick: ClickEventHandler = (event) => {
        // Handle the click event here
    };

    button.addEventListener('click', handleClick);
}

```
