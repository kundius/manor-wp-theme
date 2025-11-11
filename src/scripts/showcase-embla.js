import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyShowcaseEmbla(root) {
  const viewportNode = root.querySelector('[data-showcase-embla-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const controlsNodes = root.querySelectorAll('[data-showcase-embla-controls]') || []

  controlsNodes.forEach((controlsNode) => {
    const prevBtnNode = controlsNode.querySelector('[data-showcase-embla-controls-prev]')
    const nextBtnNode = controlsNode.querySelector('[data-showcase-embla-controls-next]')
    if (prevBtnNode && nextBtnNode) {
      const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
        emblaApi,
        prevBtnNode,
        nextBtnNode
      )
      emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
    }
  })
}

export function initShowcaseEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-showcase-embla]'))
  nodes.forEach(applyShowcaseEmbla)
}
