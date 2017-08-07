import {forEach} from 'lodash'

function fileAllMeta () {
  let elements = document.querySelectorAll('.item-file-all-metadata-toggle')

  if (!elements) {
    return
  }

  forEach(elements, (element) => {
    element.addEventListener('click', showMeta)
  })
}

function showMeta (event) {
  let meta = event.target.parentNode.querySelector('.item-file-all-metadata')

  if (meta.clientHeight > 0) {
    meta.style.height = 0
  } else {
    meta.style.height = 'auto'
    let height = meta.clientHeight
    meta.style.height = 0

    setTimeout(() => {
      meta.style.height = `${height}px`
    }, 0)
  }

  // Toggle chevron
  event.target.classList.toggle('toggled')
}

export {fileAllMeta}
