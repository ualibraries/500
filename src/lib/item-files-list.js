import Masonry from 'masonry-layout'
import imagesLoaded from 'imagesloaded'

function itemFilesList () {
  let container = document.querySelector('.item-files-list')

  if (!container) {
    return
  }

  imagesLoaded(container, () => {
    let masonry = new Masonry(container, {
      itemSelector: '.item-file',
      columnWidth: 248
    })

    return masonry
  })
}

export {itemFilesList}
