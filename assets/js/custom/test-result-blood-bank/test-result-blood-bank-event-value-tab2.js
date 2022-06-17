function setBloodABO_2(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.lababoantia2 = row.cells[2].children[0].value ;
    item.lababoantib2 = row.cells[3].children[0].value ;
    item.lababoantiab2 = row.cells[4].children[0].value ;
    item.lababoacells2 = row.cells[5].children[0].value ;
    item.lababobcells2 = row.cells[6].children[0].value ;
    item.lababoocells2 = row.cells[7].children[0].value ;
    
    row.cells[0].innerHTML = JSON.stringify(item);

}

function setLabBloodABO_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lababobloodgroup2 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(item);
}

function setLabBloodReagent_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labreagent2 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}
// Start Rh Tab 2
function setLabRhReagent_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhreagent2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhrt2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lab37c2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labiat2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labccc2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labresult2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}
// End Rh Tab 2

// Start    Antibody Sceening test Tab 2
function setLabAntibodySceenTest_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentest2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestp1mi_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestp1mi2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO3_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto32 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestLotno_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestlotno2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Tab 2


// Start    Antibody identification test Tab 2
function setLabAntibodyIdentificationTest_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest3_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest32 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest4_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest42 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest5_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest52 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest6_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest62 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest7_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest72 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest8_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest82 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest9_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest92 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest10_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest102 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest11_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest112 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestAuto_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestauto2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestLotno_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestlotno2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab 2

// Start    Saliva test test Tab 2
function setLabSalivatestACells_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestacells2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestBCells_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestbcells2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestOCells_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatesotcells2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}


// End    Saliva test test Tab 2

// Start Titration test test Tab 2
function setLabTitrationAntiSerum_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationantiserum2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationCell_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationcell2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration4_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration42 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration8_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration82 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration16_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration162 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration32_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration322 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration64_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration642 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration128_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration1282 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration256_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration2562 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration512_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration5122 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1024_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration10242 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2048_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration20482 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationTiter0(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationtiter2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End  Titration test test Tab 2


// StartCold Agglutinin Tab 2
function setLabColdAgglutinin1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin4_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin42 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin8_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin82 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin16_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin162 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin32_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin322 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin64_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin642 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin128_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin1282 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin256_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin2562 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin512_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin5122 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin1024_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin10242 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2048_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin20482 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End Cold Agglutinin Tab 2


// Start    Antibody identification test Tab Get Method 0
function setLabAntibodyIdentificationTestGetMethod_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod3_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod32 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod4_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod42 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod5_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod52 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod6_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod62 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod7_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod72 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod8_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod82 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod9_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod92 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod10_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod102 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod11_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod112 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAuto_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodauto2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAntibody_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodantibody2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodLotno_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodlotno2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab Get Method 0

// Start    Antibody Sceening test Get Method Tab 2
function setLabAntibodySceenTestGetMethod_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodtest2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodP1ma_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodp1mi2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO1_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo12 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo22 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO3_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo32 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodEnz2_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodenz2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodLotno_2(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodlotno2 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Get Method Tab 2