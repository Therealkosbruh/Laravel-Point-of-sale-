var stats = document.getElementById("stats_cont");
var order_history = document.getElementById("cart_cont");
var stats_btn = document.getElementById("stat_btn");
var history_btn = document.getElementById("history_btn");

var blocks = {
  stats: stats,
  history: order_history
};

var buttons = {
  stats: stats_btn,
  history: history_btn
};

function toggleBlock(blockName) {
    for (var key in blocks) {
      blocks[key].classList.toggle("hidden", key!== blockName);
      blocks[key].classList.toggle("visible", key === blockName);
      buttons[key].classList.toggle("active", key === blockName);
    }
  }

stats_btn.onclick = function() {
  toggleBlock("stats");
};

history_btn.onclick = function() {
  toggleBlock("history");
};