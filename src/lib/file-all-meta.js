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

function showMeta (element) {
  // Close the existing modal
  if (document.querySelector('.item-file-all-metadata-modal')) {
    document.querySelector('.item-file-all-metadata-modal').remove()
  }

  if (document.querySelector('.selected')) {
    document.querySelector('.selected').classList.remove('selected')
  }

  // Add a class to the file
  element.target.parentNode.classList.add('selected')

  // Make a new modal
  let metaContainer = element.target.parentNode.querySelector('.item-file-all-metadata')
  let infoModal = document.createElement('div')

  infoModal.classList.add('item-file-all-metadata-modal')
  infoModal.innerHTML = metaContainer.innerHTML

  infoModal.querySelector('.item-file-all-metadata-close').addEventListener('click', hideMeta)

  // Reveal the modal
  setTimeout(() => {
    infoModal.classList.add('open')
  }, 200)

  document.body.appendChild(infoModal)
}

function hideMeta (element) {
  document.querySelector('.selected').classList.remove('selected')
  element.target.parentNode.remove()
}

export {fileAllMeta}
