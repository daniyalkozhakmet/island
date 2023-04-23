const tiles = Array.from(document.querySelectorAll(".box"));
const resetButton = document.querySelector("#reset");
const calculateButton = document.querySelector("#calculate");
const resultShow = document.querySelector(".result_span");
//Empty initial board
let board = [
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
  "X",
];
//To load array after it has been sent
document.addEventListener("DOMContentLoaded", () => {
  let result =
    result_array_server.length > 0
      ? JSON.parse(result_array_server)
      : [
          [0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0],
        ];
  for (let i = 0; i < result.length; i++) {
    for (let j = 0; j < result.length; j++) {
      if (result[i][j] == 1) {
        tiles[i * result.length + j].classList.add("open");
      }
      tiles[i * result.length + j].innerText = result[i][j] == 1 ? "O" : "X";
    }
  }
  //To set previous array as an initial array
  board = [];
  tiles.forEach((tile) => {
    board.push(tile.innerText);
  });
});
//User asction depends on click
function userAction(tile, index) {
  if (tile.innerText == "X") {
    tile.innerText = "O";
    tile.classList.add("open");
    board[index] = "O";
  } else {
    tile.innerText = "X";
    tile.classList.remove("open");
    board[index] = "X";
  }
}
//Assign click event every tile
tiles.forEach((tile, index) => {
  tile.innerText = "X";
  tile.addEventListener("click", () => userAction(tile, index));
});
//To reset
function resetBoard() {
  resultShow.innerText = "";
  tiles.forEach((tile) => {
    tile.innerText = "X";
    tile.classList.remove("open");
  });
  //Even after resetting it will send empty array
  document.getElementById("clear_result_array").innerHTML = JSON.stringify([
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
  ]);
  document.getElementById("clear_result_array").value = JSON.stringify(
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0]
  );
}

const calculate = (board) => {
  let newBoard = [];
  //To turn x->0 and o-1
  board.forEach((boardItem) => {
    if (boardItem == "O") {
      newBoard.push(1);
    } else {
      newBoard.push(0);
    }
  });
  //Turn 1d array into 2d array
  const newArr = [];
  while (newBoard.length) {
    newArr.push(newBoard.splice(0, 5));
  }
  //Calculation result
  let result = findPerimeter(newArr);
  resultShow.innerText = result;
  //Sending results via hidden input
  document.getElementById("result").innerHTML = result;
  document.getElementById("result").value = result;
  document.getElementById("result_array").innerHTML = JSON.stringify(newArr);
  document.getElementById("result_array").value = JSON.stringify(newArr);
  document.getElementById("result_id").value = JSON.stringify(result_array_id);
  document.getElementById("result_id").value = JSON.stringify(result_array_id);
  document.getElementById("history_id").value = JSON.stringify(history_id);
  document.getElementById("history_id").innerHTML = JSON.stringify(history_id);
};

const findPerimeter = (island) => {
  // base case
  if (island.length == 0) {
    return 0;
  }

  M = island.length;
  N = island[0].length;

  count = 0;

  // traverse each cell of the matrix
  for (let i = 0; i < M; i++) {
    for (let j = 0; j < N; j++) {
      // if the current cell is a land
      if (island[i][j] == 1) {
        // check if top edge is adjacent to the water
        if (i == 0 || island[i - 1][j] == 0) {
          count++;
        }

        // check if bottom edge is adjacent to the water
        if (i == M - 1 || island[i + 1][j] == 0) {
          count++;
        }

        // check if left edge is adjacent to the water
        if (j == 0 || island[i][j - 1] == 0) {
          count++;
        }

        // check if right edge is adjacent to the water
        if (j == N - 1 || island[i][j + 1] == 0) {
          count++;
        }
      }
    }
  }
  return count;
};

resetButton.addEventListener("click", resetBoard);
calculateButton.addEventListener("click", () => calculate(board));
