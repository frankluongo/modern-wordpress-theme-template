export default class Lightbox {
  constructor() {
    this.lightboxItems = document.querySelectorAll('[data-js="Lightbox.Item"]');
    if (!this.lightboxItems.length) return;
    this.init();
  }

  init() {
    this.limit = this.lightboxItems.length - 1;
    this.cacheImages();
    this.getCaptions();
    this.buildCaptionElem();
    this.buildLightbox();
    this.appendLightbox();
    this.defineLightboxElements();
    this.buildIndicators();
    this.defineIndicators();
    this.observeLightbox();
    this.observeLightboxItems();
    this.observeKeyboard();
    this.observeIndicators();
    this.observeArrows();
  }

  cacheImages() {
    this.lightboxImages = [];
    this.lightboxItems.forEach((item) => {
      let src = item.getAttribute("data-photo");
      this.lightboxImages.push(this.buildImage(src));
    });
  }

  getCaptions() {
    this.captions = [];
    this.lightboxItems.forEach((item) => {
      let caption = item.getAttribute("data-caption");
      this.captions.push(caption);
    });
  }

  buildCaptionElem() {
    this.caption = document.createElement("div");
    this.caption.classList.add("lightbox__caption");
    this.caption.setAttribute("data-js", "Lightbox.Caption");
  }

  buildImage(src) {
    let image = new Image();
    image.src = src;
    return image;
  }

  buildLightbox() {
    this.lightbox = document.createElement("div");
    this.lightbox.classList.add("lightbox");
    this.lightbox.setAttribute("data-js", "Lightbox");
    this.lightbox.setAttribute("data-active", "false");
    this.lightbox.innerHTML = `
    <div class="lightbox__content" data-js="Lightbox.Content"></div>
    <div class="lightbox__arrows">
      <div data-js="Lightbox.Arrows" class="lightbox__arrow lightbox__arrow-left">Prev</div>
      <div data-js="Lightbox.Arrows" class="lightbox__arrow lightbox__arrow-right">Next</div>
    </div>
    <div class="lightbox__indicators" data-js="Lightbox.Indicators"></div>`;
  }

  appendLightbox() {
    document.querySelector("body").appendChild(this.lightbox);
  }

  defineLightboxElements() {
    this.lightboxContent = this.lightbox.querySelector(
      '[data-js="Lightbox.Content"]'
    );
    this.lightboxIndicators = this.lightbox.querySelector(
      '[data-js="Lightbox.Indicators"]'
    );
    this.lightboxArrows = this.lightbox.querySelectorAll(
      '[data-js="Lightbox.Arrows"]'
    );
  }

  buildIndicators() {
    this.lightboxItems.forEach((item, index) => {
      this.lightboxIndicators.innerHTML += `<div class="lightbox__indicator" data-js="Lightbox.Indicator" data-index="${index}"></div>`;
    });
  }

  defineIndicators() {
    this.lightboxIndicatorItems = Array.from(
      this.lightbox.querySelectorAll('[data-js="Lightbox.Indicator"]')
    );
  }

  updateIndicators(value) {
    this.lightboxIndicatorItems.forEach((item, index) => {
      if (index === value) {
        item.setAttribute("data-active", true);
      } else {
        item.setAttribute("data-active", false);
      }
    });
  }

  observeLightbox() {
    this.lightbox.addEventListener("click", (event) => {
      if (
        event.target === this.lightbox ||
        event.target === this.lightboxContent
      ) {
        this.closeLightbox();
      }
    });
  }

  observeLightboxItems() {
    this.lightboxItems.forEach((item, index) => {
      item.addEventListener("click", this.launchLightbox.bind(this, index));
    });
  }

  observeKeyboard() {
    document.addEventListener("keyup", (event) => {
      let key = event.key;
      switch (key) {
        case "ArrowRight":
          this.incrementItem(1);
          break;
        case "ArrowLeft":
          this.incrementItem(-1);
          break;
        case "Escape":
          this.closeLightbox();
          break;
        default:
          null;
      }
    });
  }

  observeIndicators() {
    this.lightboxIndicatorItems.forEach((item, index) => {
      item.addEventListener("click", this.appendContent.bind(this, index));
    });
  }

  observeArrows() {
    this.lightboxArrows.forEach((arrow, index) => {
      arrow.addEventListener("click", this.handleArrowClick.bind(this, index));
    });
  }

  handleArrowClick(index) {
    index === 0 ? this.incrementItem(-1) : this.incrementItem(1);
  }

  launchLightbox(index) {
    this.lightbox.setAttribute("data-active", true);
    this.appendContent(index);
  }

  appendContent(index) {
    this.lightboxContent.innerHTML = "";
    this.caption.innerHTML = "";
    if (this.captions[index] !== null) {
      this.caption.innerHTML = `<small class="lightbox__caption-text">${this.captions[index]}</small>`;
    }
    this.lightboxContent.appendChild(this.lightboxImages[index]);
    this.lightboxContent.appendChild(this.caption);
    this.updateIndicators(index);
    this.index = index;
  }

  closeLightbox() {
    this.lightbox.setAttribute("data-active", false);
  }

  incrementItem(value) {
    let next = this.index + value;
    next = this.checkNextIndex(next);
    this.appendContent(next);
  }

  checkNextIndex(value) {
    value > this.limit ? (value = 0) : null;
    value < 0 ? (value = this.limit) : null;
    return value;
  }
}
