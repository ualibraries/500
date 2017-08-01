function open (nav) {
  // Open the menu
  nav.classList.add('open')
  // Close the menu if the user clicks outside of it
  document.body.addEventListener('click', handleOutsideNavClick)

  // Add the overlay
  let overlay = document.createElement('div')
  overlay.className = 'exhibit-menu-links-overlay'
  document.body.append(overlay)

  // Fade in the overlay
  setTimeout(() => {
    overlay.style.opacity = '1'
  }, 200)
}

function close (nav) {
  // Remove the outside-menu click listener
  document.body.removeEventListener('click', handleOutsideNavClick)

  // Close the menu
  nav.classList.remove('open')

  // Fade out the overlay
  let overlay = document.querySelector('.exhibit-menu-links-overlay')
  overlay.style.opacity = '0'

  // Remove the overlay
  setTimeout(() => {
    overlay.remove()
  }, 250)
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
  let nav = document.getElementById('exhibit-menu-links')
  let navToggle = document.getElementById('exhibit-menu-toggle')

  if (!nav.contains(event.target) && !navToggle.contains(event.target)) {
    close(nav)
  }
}

function exhibitMenu () {
  document.getElementById('exhibit-menu-toggle').addEventListener('click', toggle)
  document.getElementById('exhibit-menu-close').addEventListener('click', toggle)
}

export {exhibitMenu}
