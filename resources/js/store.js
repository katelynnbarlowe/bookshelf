import Reactive from 'vue';

export default {
    state: 'all',
    katyMinimumRating: 0,
    goodreadsMinimumRating: 0,
    overlappingShelves: [],
    updateState(state) {
        this.state = state;
        if(state !== 'read') {
            this.setKatyMinimumRating(0);
        }
    },
    setKatyMinimumRating(rating) {
        this.katyMinimumRating = rating;
        if(rating !== 0) {
            this.updateState('read');
        }
    }
};
