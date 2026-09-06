const profiles = getProfiles();

let index = 0;
let history = [];
let dragging = false;
let startX = 0;
let currentX = 0;

const card = document.querySelector("#profileCard");
const profileImage = document.querySelector("#profileImage");
const profileTitle = document.querySelector("#profileTitle");
const profileJob = document.querySelector("#profileJob");
const profileBio = document.querySelector("#profileBio");
const tags = document.querySelector("#tags");

const likeStamp = document.querySelector("#likeStamp");
const nopeStamp = document.querySelector("#nopeStamp");
const emptyState = document.querySelector("#emptyState");

const likeButton = document.querySelector("#likeBtn");
const nopeButton = document.querySelector("#nopeBtn");
const superButton = document.querySelector("#superBtn");
const undoButton = document.querySelector("#undoBtn");
const restartButton = document.querySelector("#restartBtn");

function renderProfile() {
  const profile = profiles[index];

  if (!profile) {
    card.classList.add("hidden");
    emptyState.classList.remove("hidden");
    emptyState.classList.add("grid");
    return;
  }

  emptyState.classList.add("hidden");
  emptyState.classList.remove("grid");

  card.classList.remove("hidden", "fly-left", "fly-right");
  card.style.transform = "";

  profileImage.src = profile.image;
  profileImage.alt = `Foto de ${profile.name}`;

  profileTitle.textContent = `${profile.name}, ${profile.age}`;
  profileJob.textContent = `${profile.job} • ${profile.distance}`;
  profileBio.textContent = profile.bio;

  tags.innerHTML = profile.tags.map(function (tag) {
    return `
      <span class="rounded-full bg-black/25 px-3 py-1.5 text-xs font-bold text-white backdrop-blur">
        ${tag}
      </span>
    `;
  }).join("");

  lucide.createIcons();
}

function performAction(direction) {
  if (index >= profiles.length) {
    return;
  }

  history.push(index);

  if (direction === "right") {
    card.classList.add("fly-right");
  } else {
    card.classList.add("fly-left");
  }

  setTimeout(function () {
    index++;
    renderProfile();
  }, 300);
}

likeButton.addEventListener("click", function () {
  performAction("right");
});

nopeButton.addEventListener("click", function () {
  performAction("left");
});

superButton.addEventListener("click", function () {
  performAction("right");
});

undoButton.addEventListener("click", function () {
  if (history.length === 0) {
    return;
  }

  index = history.pop();
  renderProfile();
});

restartButton.addEventListener("click", function () {
  index = 0;
  history = [];
  renderProfile();
});

card.addEventListener("pointerdown", function (event) {
  dragging = true;
  startX = event.clientX;

  card.setPointerCapture(event.pointerId);
  card.classList.add("is-dragging");
});

card.addEventListener("pointermove", function (event) {
  if (!dragging) {
    return;
  }

  currentX = event.clientX - startX;

  card.style.transform =
    `translateX(${currentX}px) rotate(${currentX / 24}deg)`;

  likeStamp.style.opacity = Math.max(
    0,
    Math.min(1, currentX / 90)
  );

  nopeStamp.style.opacity = Math.max(
    0,
    Math.min(1, -currentX / 90)
  );
});

card.addEventListener("pointerup", function () {
  dragging = false;

  card.classList.remove("is-dragging");

  likeStamp.style.opacity = 0;
  nopeStamp.style.opacity = 0;

  if (Math.abs(currentX) > 100) {
    if (currentX > 0) {
      performAction("right");
    } else {
      performAction("left");
    }
  } else {
    card.style.transform = "";
  }

  currentX = 0;
});

document.addEventListener("keydown", function (event) {
  if (event.key === "ArrowRight") {
    performAction("right");
  }

  if (event.key === "ArrowLeft") {
    performAction("left");
  }
});

renderProfile();