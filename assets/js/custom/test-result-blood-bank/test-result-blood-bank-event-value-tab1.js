function setBloodABO_1(self) {

    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);

    item.lababoantia1 = row.cells[2].children[0].value ;
    item.lababoantib1 = row.cells[3].children[0].value ;
    item.lababoantiab1 = row.cells[4].children[0].value ;
    item.lababoacells1 = row.cells[5].children[0].value ;
    item.lababobcells1 = row.cells[6].children[0].value ;
    item.lababoocells1 = row.cells[7].children[0].value ;
    
    row.cells[0].innerHTML = JSON.stringify(item);

}

function setLabBloodABO_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lababobloodgroup1 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
    console.log(item);
}

function setLabBloodReagent_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labreagent1 = self.value;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// Start Rh Tab 1
function setLabRhReagent_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhreagent1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labrhrt1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.lab37c1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labiat1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labccc1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labresult1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}
// End Rh Tab 1

// Start    Antibody Sceening test Tab 1
function setLabAntibodySceenTest_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentest1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestp1mi_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestp1mi1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO3_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentesto31 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestLotno_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestlotno1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Tab 1


// Start    Antibody identification test Tab 1
function setLabAntibodyIdentificationTest_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest3_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest31 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest4_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest41 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest5_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest51 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest6_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest61 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest7_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest71 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest8_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest81 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest9_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest91 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest10_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest101 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest11_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtest111 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestAuto_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestauto1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestLotno_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestlotno1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab 1

// Start    Saliva test test Tab 1
function setLabSalivatestACells_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestacells1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestBCells_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatestbcells1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestOCells_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labsalivatesotcells1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}


// End    Saliva test test Tab 1

// Start Titration test test Tab 1
function setLabTitrationAntiSerum_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationantiserum1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationCell_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationcell1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration4_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration41 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration8_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration81 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration16_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration161 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration32_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration321 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration64_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration641 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration128_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration1281 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration256_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration2561 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration512_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration5121 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1024_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration10241 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2048_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitration20481 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationTiter0(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labtitrationtiter1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End  Titration test test Tab 1


// StartCold Agglutinin Tab 1
function setLabColdAgglutinin1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin4_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin41 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin8_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin81 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin16_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin161 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin32_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin321 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin64_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin641 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin128_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin1281 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin256_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin2561 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin512_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin5121 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin1024_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin10241 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2048_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labcoldagglutinin20481 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End Cold Agglutinin Tab 1


// Start    Antibody identification test Tab Get Method 0
function setLabAntibodyIdentificationTestGetMethod_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod3_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod31 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod4_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod41 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod5_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod51 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod6_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod61 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod7_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod71 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod8_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod81 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod9_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod91 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod10_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod101 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod11_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethod111 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAuto_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodauto1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAntibody_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodantibody1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodLotno_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodyidentificationtestgetmethodlotno1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody identification test Tab Get Method 0

// Start    Antibody Sceening test Get Method Tab 1
function setLabAntibodySceenTestGetMethod_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodtest1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodP1ma_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodp1mi1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO1_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo11 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO2_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo21 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO3_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodo31 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function set0_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodenz1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodLotno_1(self) {
    var row = self.parentNode.parentNode;
    var item = JSON.parse(row.cells[0].innerHTML);
    item.labantibodysceentestgetmethodlotno1 = self.value ;
    row.cells[0].innerHTML = JSON.stringify(item);
}

// End    Antibody Sceening test Get Method Tab 1