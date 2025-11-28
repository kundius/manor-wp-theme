import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applySimilarEmbla(root) {
  const viewportNode = root.querySelector('[data-similar-embla-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-similar-embla-prev]')
  const nextBtnNode = root.querySelector('[data-similar-embla-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }
}

export function initSimilarEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-similar-embla]'))
  nodes.forEach(applySimilarEmbla)
}
