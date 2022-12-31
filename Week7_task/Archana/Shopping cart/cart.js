let addressBlock;

window.addEventListener("DOMContentLoaded", (event) => {
  const place_order = document.querySelector("#place_order");
  addressBlock = document.querySelector("#address-block");
  place_order.onclick = handlePlaceOrder;
  addressBlock.style.display = "none";
});

function handlePlaceOrder() {
 addressBlock.style.display = "block"
}
