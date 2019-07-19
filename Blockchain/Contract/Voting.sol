pragma solidity ^0.5.1;

contract Voting {

    struct TPS {
        uint pemilih_id;
        uint kandidat_id;
        bool isTrue;
    }

    address public Vote;
    
    mapping(uint => TPS[]) public dataTPS;

    modifier VoteOnly() {
    	require(msg.sender == Vote);
    	_;
    }

    function vote (uint tpsId,uint pemilihId, uint kandidatId, bool isTrue)  public VoteOnly {
        
        dataTPS[tpsId].push(TPS(pemilihId,kandidatId,isTrue));
        
    }
}