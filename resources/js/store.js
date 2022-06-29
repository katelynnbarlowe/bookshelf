import Reactive from 'vue';

export default {
    state: 'all',
    katyMinimumRating: 0,
    goodreadsMinimumRating: 0,
    overlappingShelves: [],
    allShelvesInCollection: {},
    updateState(state) {
        this.state = state;
        if (state !== 'read') {
            this.setKatyMinimumRating(0);
        }
    },
    setKatyMinimumRating(rating) {
        this.katyMinimumRating = rating;
        if (rating !== 0) {
            this.updateState('read');
        }
    },
    setGoodreadsMinimumRating(rating) {
        this.goodreadsMinimumRating = rating;
    },
    addShelves(shelves) {
        shelves.forEach((shelf) => {
            if (!this.allShelvesInCollection[shelf.id]) {
                this.allShelvesInCollection[shelf.id] = shelf.name;
            }
        });
    },
    addOverlappingShelf(shelfId) {
        if(this.overlappingShelves.indexOf(shelfId) === -1) {
            this.overlappingShelves.push(shelfId);
            return;
        }
        this.overlappingShelves = this.overlappingShelves.filter((value)=>{ return value !== shelfId; });
    }
};
