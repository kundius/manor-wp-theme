import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyProjectMedia(root) {
  const viewportNode = root.querySelector('[data-project-media-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-project-media-prev]')
  const nextBtnNode = root.querySelector('[data-project-media-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }

  const thumbNodes = root.querySelectorAll('[data-project-media-thumb]') || []
  thumbNodes.forEach((thumbNode, index) => {
    thumbNode.addEventListener('click', (e) => {
      const itemNode = root.querySelector(
        `[data-project-media-item="${thumbNode.dataset.projectMediaThumb}"]`
      )
      if (itemNode) {
        e.preventDefault()
        itemNode.click()
      }
    })
  })
}

export function initProjectMedia() {
  const nodes = Array.from(document.querySelectorAll('[data-project-media]'))
  nodes.forEach(applyProjectMedia)
}
