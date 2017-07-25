import './styles/main.css'
import {loadFonts} from './lib/fonts.js'
import {exhibitMenu} from './lib/exhibit-menu.js'
import {itemFilesList} from './lib/item-files-list.js'

document.addEventListener('DOMContentLoaded', () => {
  loadFonts()
  exhibitMenu()
  itemFilesList()
})
