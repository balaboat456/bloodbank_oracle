function setBloodABO_child(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.lababoantia_child = row.cells[2].children[0].value;
    item.lababoantib_child = row.cells[3].children[0].value;
    item.lababoantiab_child = row.cells[4].children[0].value;
    item.lababoacells_child = row.cells[5].children[0].value;
    item.lababobcells_child = row.cells[6].children[0].value;
    item.lababoocells_child = row.cells[7].children[0].value;

    row.cells[0].innerHTML = JSON.stringify(item);

}

function setLabBloodABO_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lababobloodgroup_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(item);
}

function setLabBloodReagent_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labreagent_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

/////////////////////////////////////////////////////////////////////////////////
function setBloodABO_father(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.lababoantia_father = row.cells[2].children[0].value;
    item.lababoantib_father = row.cells[3].children[0].value;
    item.lababoantiab_father = row.cells[4].children[0].value;
    item.lababoacells_father = row.cells[5].children[0].value;
    item.lababobcells_father = row.cells[6].children[0].value;
    item.lababoocells_father = row.cells[7].children[0].value;

    row.cells[0].innerHTML = JSON.stringify(item);

}

function setLabBloodABO_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lababobloodgroup_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(item);
}

function setLabBloodReagent_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labreagent_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

/////////////////////////////////////////////////////////////////////////////////

function setLabRhReagent_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhreagent_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhrt_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lab37c_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labiat_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labccc_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_child(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labresult_child = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

////////////////////////////////////////////////////////////////////////////////

function setLabRhReagent_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhreagent_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhrt_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lab37c_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labiat_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labccc_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_father(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labresult_father = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}