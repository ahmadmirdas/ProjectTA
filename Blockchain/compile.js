const path = require('path')
const fs = require('fs')
const solc = require('solc')

const inboxPath = path.resolve(__dirname, 'Contract', 'Voting.sol')

const source = fs.readFileSync(inboxPath, 'utf8')

var input = {
    language: 'Solidity',
    sources: {
        'Voting.sol': {
            content: source
        }
    },
    settings: {
        outputSelection: {
            '*': {
                '*': ['*']
            }
        }
    }
}

var output = JSON.parse(solc.compile(JSON.stringify(input)))
module.exports = output.contracts['Voting.sol'].Voting