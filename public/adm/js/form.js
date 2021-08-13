import Generator from "./Generator.js";

document.getElementById("addQ").addEventListener("click", AddQuestion, false);


const questionGenerator = new Generator('question');
const answerGenerator = new Generator('answer');
const container = document.getElementById('forms');

function AddQuestion() {
    let currentId = questionGenerator.getNext();
    let type = document.getElementById('type')
    let block = document.createElement('div');
    block.id = `c${currentId}`;
    block.innerHTML = `
            <div class="row">
                <div class="col">
                    <label class="mr-1" for="${currentId}">Pregunta <strong>${questionGenerator.getId()} </strong></label>
                </div>
            </div>     
            <div class="row">
                <div class="col-7 w-100">
                      <input required type="text"  name="${currentId}" class="form-control w-100" id="${currentId}">
                </div>
                <div class="offset-1 col-4 w-100">
                     <button TYPE="button" id="del${currentId}"  class="btn btn-danger w-100">Eliminar</button>
                </div>
            </div>
            <div class="container" id="ans${currentId}">
                <div class="row mt-1">
                    <div class="col">
                    <h5><strong> Respuestas</strong></h5>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row"><div class="offset-4 col-4">
                <button TYPE="button" id="add${currentId}"  class="btn btn-success w-100">+</button>
            </div>
            </div>
            </div>  
        </div>
`;
    container.appendChild(block);
    document.getElementById(`del${currentId}`)
        .addEventListener("click",
            () => container.removeChild(block), false);

    document.getElementById(`add${currentId}`)
        .addEventListener("click",
            () => addResponse(currentId), false);


    addResponse(`${currentId}`);
}

function addResponse(id) {
    let currentId = answerGenerator.getNext();
    let ansContainer = document.getElementById(`ans${id}`);
    let block = document.createElement('div');
    block.id = currentId;

    block.innerHTML =
        ` <div class="row mt-2">
                <div class="col-9">
                    <input required type="text"  name="${id}${currentId}" class="form-control w-100" id="${currentId}">
                </div>
              <div class="offset-1 col-2 w-100 mt-2">
                     <button TYPE="button" id="delAns${currentId}"  class="btn btn-danger w-100">-</button>
                </div>
             </div>
              `;
    ansContainer.appendChild(block)
    document.getElementById(`delAns${currentId}`)
        .addEventListener("click",
            () => ansContainer.removeChild(block), false);
}
