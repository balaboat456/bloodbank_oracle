"use strict";

function setBloodABO_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.lababoantia0 = row.cells[2].children[0].value;
  item.lababoantib0 = row.cells[3].children[0].value;
  item.lababoantiab0 = row.cells[4].children[0].value;
  item.lababoacells0 = row.cells[5].children[0].value;
  item.lababobcells0 = row.cells[6].children[0].value;
  item.lababoocells0 = row.cells[7].children[0].value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabBloodABO_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.lababobloodgroup0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
  console.log(item);
}

function setLabBloodReagent_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labreagent0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // Start Rh Tab 0


function setLabRhReagent_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labrhreagent0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabRhRt_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labrhrt0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLab37C_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.lab37c0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabIAT_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labiat0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabCCC_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labccc0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabResult_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labresult0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End Rh Tab 0
// Start    Antibody Sceening test Tab 0


function setLabAntibodySceenTestP1Mi_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestpimi0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTest_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentest0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestp1mi_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestp1mi0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentesto10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentesto20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestO3_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentesto30 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestLotno_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestlotno0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End    Antibody Sceening test Tab 0
// Start    Antibody identification test Tab 0


function setLabAntibodyIdentificationTest_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest3_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest30 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest4_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest40 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest5_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest50 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest6_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest60 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest7_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest70 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest8_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest80 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest9_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest90 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest10_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest100 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTest11_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtest110 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestAuto_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestauto0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestLotno_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestlotno0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End    Antibody identification test Tab 0
// Start    Saliva test test Tab 0


function setLabSalivatestACells_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labsalivatestacells0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestBCells_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labsalivatestbcells0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabSalivatestOCells_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labsalivatesotcells0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End    Saliva test test Tab 0
// Start Titration test test Tab 0


function setLabTitrationAntiSerum_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitrationantiserum0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationCell_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitrationcell0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration4_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration40 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration8_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration80 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration16_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration160 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration32_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration320 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration64_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration640 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration128_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration1280 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration256_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration2560 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration512_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration5120 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration1024_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration10240 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitration2048_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitration20480 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabTitrationTiter0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labtitrationtiter0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
  console.log(self.value);
} // End  Titration test test Tab 0
// StartCold Agglutinin Tab 0


function setLabColdAgglutinin1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin4_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin40 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin8_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin80 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin16_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin160 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin32_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin320 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin64_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin640 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin128_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin1280 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin256_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin2560 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin512_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin5120 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin1024_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin10240 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabColdAgglutinin2048_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labcoldagglutinin20480 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End Cold Agglutinin Tab 0
// Start    Antibody identification test Tab Get Method 0


function setLabAntibodyIdentificationTestGetMethod_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod3_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod30 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod4_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod40 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod5_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod50 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod6_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod60 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod7_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod70 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod8_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod80 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod9_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod90 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod10_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod100 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethod11_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethod110 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAuto_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethodauto0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodAntibody_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethodantibody0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodyIdentificationTestGetMethodLotno_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodyidentificationtestgetmethodlotno0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End    Antibody identification test Tab Get Method 0
// Start    Antibody Sceening test Get Method Tab 0


function setLabAntibodySceenTestGetMethod_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodtest0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodP1ma_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodp1mi0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO1_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodo10 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO2_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodo20 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodO3_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodo30 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function set0_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodenz0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
}

function setLabAntibodySceenTestGetMethodLotno_0(self) {
  var row = self.parentNode.parentNode;
  var item = JSON.parse(row.cells[0].innerHTML);
  item.labantibodysceentestgetmethodlotno0 = self.value;
  row.cells[0].innerHTML = JSON.stringify(item);
} // End    Antibody Sceening test Get Method Tab 0