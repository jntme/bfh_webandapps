import { Component, OnInit } from '@angular/core';

import 'rxjs/add/observable/of';
import { PatientSearchService } from "app/patient-search.service";

import { Router } from "@angular/router";
import { Observable } from "rxjs/Observable";

//Observable operators
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/catch';

import { Patient } from "app/patient";
import { Subject } from "rxjs/Subject";


@Component({
  selector: 'patient-search',
  templateUrl: './patient-search.component.html',
  styleUrls: ['./patient-search.component.css'],
  providers: [PatientSearchService]
})
export class PatientSearchComponent implements OnInit {
  patients: Observable<Patient[]>;
  private searchTerms = new Subject<string>();

  constructor(
    private patientSearchService: PatientSearchService,
    private router: Router) { }

  search(term: string): void {
    this.searchTerms.next(term);
  }

  ngOnInit() : void{
    this.patients = this.searchTerms
        .debounceTime(300) //wait 300ms after each keystroke before considering the term
        .distinctUntilChanged() //ignore if next search is not different from the previous
        .switchMap(term => term // switch to new Observable each time the term changes)
                    //return the http search observable
                    ? this.patientSearchService.search(term)
                    //or the observable of empty patients if there was no search term
                    : Observable.of<Patient[]>([]))
                  .catch(error => {
                    console.log(error);
                    return Observable.of<Patient[]>([]);
                  });

    this.patients.subscribe(patient => console.log(patient))
  }

  goToDetail(patient: Patient) : void {
    console.log('test');
    let link = ['/detail', patient.id];
    this.router.navigate(link);
  }

}
