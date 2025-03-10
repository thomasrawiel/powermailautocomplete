# powermailautocomplete
This extension aims to add most autocomplete options to powermail fields.

https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#autofill-field


## Installation
`composer require traw/powermailautocomplete`

## Setup
Add the typoscript template "Powermail Autocomplete" after the Powermail Maintemplate


If you override the partials for input and textarea fields or the Form template, e.g. in your own extension, make sure to update those files:
- add the namespace `{namespace t=TRAW\Powermailautocomplete\ViewHelpers}`
- replace the f:form ViewHelpers and add the autocomplete attribute
See the [example partials](https://github.com/thomasrawiel/powermailautocomplete/tree/main/Resources/Private/Partials/Form/Field) and [example template](https://github.com/thomasrawiel/powermailautocomplete/blob/main/Resources/Private/Templates/Form/Form.html) for reference


## Editors
Editors can enable autocompletion in the Extended tab of the powermail form record

Additionally explicit autocomplete field values, autofill sections and more can be set in powermail's field records.

Available values and explanations can be found in the references section

### References:
- https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#autofill-field
- https://wiki.selfhtml.org/wiki/HTML/Attribute/autocomplete#autocomplete_und_Autofill
- https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/autocomplete
