export default class Errors {
    constructor() {
        this.errors = {}
    }
    has(field, subfiled = null) {
        if (subfiled !== null) {
            if (this.errors.hasOwnProperty(field)) {
                return this.errors[field].hasOwnProperty(subfiled)
            } else {
                return false;
            }
        }
        return this.errors.hasOwnProperty(field);

    }
    hasMultiple(field, index, subfiled) {
        if (this.errors.hasOwnProperty(field) && this.errors[field].hasOwnProperty(index)) {
            return this.errors[field][index].hasOwnProperty(subfiled);
        }
    }
    get(field, subfiled = null) {
        if (this.errors[field]) {
            if (subfiled !== null) {
                return this.errors[field][subfiled][0]
            }
            if (Array.isArray(this.errors[field]) && Array.isArray(this.errors[field][0])) {
                return this.errors[field][0][0];
            } else if (!Array.isArray(this.errors[field])) {
                let i = Object.keys(this.errors[field])[0];
                return this.errors[field][i][0]
            }
            return this.errors[field][0]
        }
    }
    getMultiple(field, index, subfiled) {
        if (this.errors[field]) {
            if (this.errors[field][index].hasOwnProperty(subfiled)) {
                return this.errors[field][index][subfiled][0];
            }
        }
    }
    record(errors) {
        if (errors == undefined) {
            this.errors = {};
        } else {
            this.errors = errors;
        }
    }
    any() {
        return Object.keys(this.errors).length > 0;
    }
}