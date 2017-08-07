import './styles/main.css'
import {loadFonts} from './lib/fonts.js'
import {exhibitMenu} from './lib/exhibit-menu.js'
import {fileAllMeta} from './lib/file-all-meta.js'
import {disableStylesheets} from './lib/disable-stylesheets.js'

document.addEventListener('DOMContentLoaded', () => {
  loadFonts()
  exhibitMenu()
  fileAllMeta()
  disableStylesheets()
})
