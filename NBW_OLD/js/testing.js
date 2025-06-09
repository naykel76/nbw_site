// const removeNonWordChars = 'Hi, do you know your abc\'s?'.replace(/\W/g, '');
// console.log(removeNonWordChars);


// const input = 'Hi, do you know your abc\'s?';

// // Convert any character that follows a hyphen, underscore, whitespace, or single quote to uppercase
// const camel =  input.replace(/[-_\s'](.)/g, (_, c) => c.toUpperCase());

// // Remove all non-word characters
// const sanitize = camel.replace(/\W/g, '');

// // Convert the first character to lowercase
// const result = sanitize.charAt(0).toLowerCase() + sanitize.slice(1);

// console.log(result);


const input = 'Hi, do you know your abc\'s?';

const result = input
    // Convert any character that follows a hyphen, underscore, or whitespace to uppercase
    .replace(/[-_\s]+(.)/g, (_, c) => c.toUpperCase())
    // Remove all remaining non-word characters
    .replace(/\W/g, '')
    // Convert the first character to lowercase
    .replace(/^(.)/, (_, c) => c.toLowerCase());

console.log(result); // Outputs: "hiDoYouKnowYourAbcs"

