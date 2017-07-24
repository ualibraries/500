function open (nav) {
  nav.classList.add('open')
  // Close the menu if the user clicks outside of it
  document.body.addEventListener('click', handleOutsideNavClick)
}

function close (nav) {
  document.body.removeEventListener('click', handleOutsideNavClick)
  nav.classList.remove('open')
}

function toggle () {
  let nav = document.getElementById('exhibit-menu-links')

  if (nav.classList.contains('open')) {
    // Close menu
    close(nav)
  } else {
    // Open menu
    open(nav)
  }
}

function handleOutsideNavClick (event) {
  let navContainer = document.getElementById('exhibit-menu')
  let nav = document.getElementById('exhibit-menu-links')

  if (!navContainer.contains(event.target)) {
    close(nav)
  }
}

function exhibitMenu () {
  document.getElementById('exhibit-menu-toggle').addEventListener('click', toggle)
  document.getElementById('exhibit-menu-close').addEventListener('click', toggle)
}

export {exhibitMenu}
