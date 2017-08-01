import {forEach} from 'lodash'

// Array, stylesheets to disable
const disabled = [
  'plugins/ExhibitBuilder/views/shared/exhibit_layouts/gallery/layout.css',
  'plugins/PullquoteLayout/views/shared/exhibit_layouts/pull-quote/layout.css'
]

// Disable stylesheets listed in the `disabled` array
function disableStylesheets () {
  forEach(document.styleSheets, (stylesheet) => {
    // If the stylesheet is external
    if (stylesheet.href) {
      disabled.forEach((element) => {
        // If the stylesheet appears in the `disabled` array, disable it
        if (stylesheet.href.indexOf(element) >= 0) {
          stylesheet.disabled = true
        }
      })
    }
  })
}

export {disableStylesheets}
