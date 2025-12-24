import Masonry from 'masonry-layout'

export function initProjectLayout() {
  const layout = document.querySelector('[data-project-layout]')

  if (!layout) return

  var msnry = new Masonry(layout, {
    itemSelector: '[data-project-layout-item]',
    percentPosition: true,
    gutter: 50
  })
}
