function setBloodABO_3(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.lababoantia3 = row.cells[2].children[0].value ;
    item.lababoantib3 = row.cells[3].children[0].value ;
    item.lababoantiab3 = row.cells[4].children[0].value ;
    item.lababoacells3 = row.cells[5].children[0].value ;
    item.lababobcells3 = row.cells[6].children[0].value ;
    item.lababoocells3 = row.cells[7].children[0].value ;
    
    row.cells[0].innerHTML = JSON.stringify(item);

}

function setLabBloodABO_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lababobloodgroup3 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(item);
}

function setLabBloodReagent_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labreagent3 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// Start Rh Tab 3
function setLabRhReagent_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhreagent3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhrt3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lab37c3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labiat3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labccc3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labresult3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}
// End Rh Tab 3

// Start    Antibody Sceening test Tab 3
function setLabAntibodySceenTest_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentest3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestp1mi_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestp1mi3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO3_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto33 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestLotno_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestlotno3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Tab 3


// Start    Antibody identification test Tab 3
function setLabAntibodyIdentificationTest_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest3_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest33 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest4_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest43 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest5_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest53 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest6_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest63 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest7_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest73 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest8_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest83 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest9_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest93 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest10_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest103 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest11_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest113 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestAuto_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestauto3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestLotno_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestlotno3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab 3

// Start    Saliva test test Tab 3
function setLabSalivatestACells_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestacells3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestBCells_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestbcells3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestOCells_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatesotcells3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}


// End    Saliva test test Tab 3

// Start Titration test test Tab 3
function setLabTitrationAntiSerum_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationantiserum3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationCell_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationcell3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration4_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration43 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration8_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration83 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration16_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration163 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration32_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration323 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration64_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration643 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration128_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration1283 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration256_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration2563 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration512_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration5123 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1024_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration10243 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2048_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration20483 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationTiter0(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationtiter3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End  Titration test test Tab 3


// StartCold Agglutinin Tab 3
function setLabColdAgglutinin1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin4_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin43 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin8_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin83 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin16_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin163 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin32_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin323 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin64_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin643 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin128_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin1283 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin256_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin2563 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin512_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin5123 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin1024_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin10243 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2048_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin20483 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End Cold Agglutinin Tab 3


// Start    Antibody identification test Tab Get Method 0
function setLabAntibodyIdentificationTestGetMethod_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod3_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod33 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod4_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod43 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod5_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod53 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod6_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod63 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod7_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod73 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod8_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod83 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod9_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod93 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod10_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod103 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod11_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod113 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAuto_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodauto3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAntibody_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodantibody3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodLotno_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodlotno3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab Get Method 0

// Start    Antibody Sceening test Get Method Tab 3
function setLabAntibodySceenTestGetMethod_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodtest3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodP1ma_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodp1mi3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO1_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo13 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO2_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo23 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO3_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo33 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodEnz3_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodenz3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodLotno_3(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodlotno3 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Get Method Tab 3