import web3 from './web3';
const Compile = require('./compile')

const address = '0x6cC2bcf4811Ab442a3bb0D7181Abe892326d9859';

export default new web3.eth.Contract(Compile.abi, address);