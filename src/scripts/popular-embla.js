import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyPopularEmbla(root) {
  const viewportNode = root.querySelector('[data-popular-embla-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-popular-embla-prev]')
  const nextBtnNode = root.querySelector('[data-popular-embla-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }
}

export function initPopularEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-popular-embla]'))
  nodes.forEach(applyPopularEmbla)
}
