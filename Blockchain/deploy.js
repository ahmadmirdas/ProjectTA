const HDWalletProvider = require('truffle-hdwallet-provider')
const Web3 = require('web3')
const Compile = require('./compile')
const END_POINT = 'https://rinkeby.infura.io/v3/e918e1a180d34836920452a3854a19b9'
const provider = new HDWalletProvider(
    'describe nuclear voice patrol burst wreck achieve draw negative depend loyal brisk',
    END_POINT
);
const web3 = new Web3(provider)
const deploy = async () => {
    const accounts = await web3.eth.getAccounts()
    console.log(Compile.evm.bytecode);

    console.log('Attempting to deploy from account', accounts[0])
    const result = await new web3.eth.Contract(Compile.abi)
        .deploy({ data: '0x' + Compile.evm.bytecode.object })
        .send({ gas: '1000000', from: accounts[0] })
    console.log('Contract deployed to', result.options.address)
};
deploy()

// const HDWalletProvider = require('truffle-hdwallet-provider');
// const Web3 = require('web3');
// const { interface, bytecode } = require('./compile');

// const provider = new HDWalletProvider(
// 	'describe nuclear voice patrol burst wreck achieve draw negative depend loyal brisk', 
// 	'https://rinkeby.infura.io/v3/e918e1a180d34836920452a3854a19b9'
// );
// const web3 = new Web3(provider);

// const deploy = async () => {
// 	const accounts = await web3.eth.getAccounts();

// 	console.log('Attempting to deploy from account', accounts[0]);

// 	const result = await new web3.eth.Contract(JSON.parse(interface))
// 		.deploy({ data: '0x' + bytecode, arguments: ['Hi there!'] })
// 		.send({ from: accounts[0] });

// 	console.log(interface);
// 	console.log('Contract deployed to', result.options.address);
// };
// deploy();