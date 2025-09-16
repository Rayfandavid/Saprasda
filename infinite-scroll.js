gsap.registerPlugin(Observer);

const container = document.querySelector(".infinite-scroll-container");
const divItems = gsap.utils.toArray(container.children);

const itemHeight = divItems[0].offsetHeight;
const itemMargin = parseFloat(getComputedStyle(divItems[0]).marginTop);
const totalItemHeight = itemHeight + itemMargin;
const totalHeight = divItems.length * totalItemHeight;
const wrapFn = gsap.utils.wrap(-totalHeight, totalHeight);


divItems.forEach((child, i) => {
  gsap.set(child, { y: i * totalItemHeight });
});

Observer.create({
  target: container,
  type: "wheel,touch,pointer",
  preventDefault: true,
  onChange: ({ deltaY, event }) => {
    const d = event.type === "wheel" ? -deltaY : deltaY;
    const distance = d * 5;
    divItems.forEach((child) => {
      gsap.to(child, {
        duration: 0.5,
        ease: "expo.out",
        y: `+=${distance}`,
        modifiers: {
          y: gsap.utils.unitize(wrapFn),
        },
      });
    });
  }
});

// Autoplay scroll
const direction = 1;
const speed = 1; // Adjust speed as needed
function tick() {
  divItems.forEach((child) => {
    gsap.set(child, {
      y: `+=${speed * direction}`,
      modifiers: {
        y: gsap.utils.unitize(wrapFn),
      },
    });
  });
  requestAnimationFrame(tick);
}
requestAnimationFrame(tick);

