function toggle () {
  let nav = document.getElementById('exhibit-menu-links')

  if (nav.classList.contains('open')) {
    // close menu
    nav.classList.remove('open')
  } else {
    // open menu
    nav.classList.add('open')
  }
}

function exhibitMenu () {
  document.getElementById('exhibit-menu-toggle').addEventListener('click', toggle)
  document.getElementById('exhibit-menu-close').addEventListener('click', toggle)
}

export {exhibitMenu}
