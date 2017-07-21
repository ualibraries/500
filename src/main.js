import './styles/main.css'
import {loadFonts} from './lib/fonts.js'
import {exhibitMenu} from './lib/exhibit-menu.js'

document.addEventListener('DOMContentLoaded', () => {
  loadFonts()
  exhibitMenu()
})
