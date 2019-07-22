import Web3 from 'web3'
const Compile = require('./compile')

const web3 = new Web3(window.web3.currentProvider)
const address = '0x25D031B8C27cfe5f8f656333F03e571e41742593';
const abi = [{"constant":false,"inputs":[{"name":"tpsId","type":"uint256"},{"name":"kandidatId","type":"uint256"}],"name":"vote","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"}];

window.web3 = web3
window.vote = new web3.eth.Contract(abi, address)
console.log(window);