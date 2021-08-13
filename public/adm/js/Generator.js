class Generator {
    constructor(name) {
        this.name = name;
        this.current = 0;
    }

    getNext() {
        return `${this.name}${++this.current}`
    }

    returnPos() {
        return --this.current;
    }

    getId() {
        return this.current;
    }
}

export default Generator;