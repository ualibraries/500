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
  let metaContainer = element.target.parentNode.querySelector('.item-file-all-metadata')
  console.log(metaContainer)
}

export {fileAllMeta}
