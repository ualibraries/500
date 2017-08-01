import './styles/main.css'
import {loadFonts} from './lib/fonts.js'
import {exhibitMenu} from './lib/exhibit-menu.js'
import {itemFilesList} from './lib/item-files-list.js'
import {fileAllMeta} from './lib/file-all-meta.js'
import {disableStylesheets} from './lib/disable-stylesheets.js'

document.addEventListener('DOMContentLoaded', () => {
  loadFonts()
  exhibitMenu()
  itemFilesList()
  fileAllMeta()
  disableStylesheets()
})
