# FlexColumLayouts for Neos CMS
Based on [tailwindcss](https://tailwindcss.com/).
It extends your standard Neos ColumnLayouts with flex properties so you can adjust every column with [css flex properties](https://css-tricks.com/snippets/css/a-guide-to-flexbox/).
It is based  on tailwindcss class names.
If you want to change the class names, feel free to do so and build a more generic grid system.

## How does it work?


## Principle
The idea behind this package is to have any options for flex layouts available to columns so as to 
test things on a website and get ideas for which layouts are feasible for the website.  
From that you can build great columnlayouts yourself which are not bound to number of columns.  
It will be far too complicated for most editors, but gives a great toolbox for advanced ones.

### TailwindCSS Classnames
If you already use tailwindcss in your project, you are all set and the classnames will be available to you.
If not, you have several choices:
1. (default) include the small css we deliver with this package which only include tailwind flex classnames 
2. include the latest [tailwind css build](https://tailwindcss.com/docs/installation) in your project (might be oversized)
3. include the scss files we provide in this package that produces tailwind-like classes



#### SCSS files
```
@import "Plugins/TechDivision.NodeTypes.FlexColumnLayouts/Resources/Private/Scss/FlexColumnLayout";
```

In this case, you can overwrite the variables defined by default:
```
// Define number of columns
$flexColumns: 12 !default;

// Define media features
$flexMediaCondition: 'min-width:' !default;

// Define media query sizes and a css class prefix for this size
// To disable the media-query-builder unset the variable like this: '$flexBreakpointConfiguration: null;'
$flexBreakpointConfiguration: (
        '640px': 'sm\\:',
        '768px': 'md\\:',
        '1024px': 'lg\\:',
        '1280px': 'xl\\:'
) !default;
```

@todo: Add breakpoints on NodeType level 