import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applySlideshowEmbla(root) {
  const viewportNode = root.querySelector('[data-slideshow-embla-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-slideshow-embla-prev]')
  const nextBtnNode = root.querySelector('[data-slideshow-embla-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }
}

export function initSlideshowEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-slideshow-embla]'))
  nodes.forEach(applySlideshowEmbla)
}
