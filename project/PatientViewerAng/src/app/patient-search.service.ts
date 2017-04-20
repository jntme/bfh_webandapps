import { Injectable } from '@angular/core';
import { Http } from "@angular/http";
import { Observable } from "rxjs/Observable";
import { Patient } from "app/patient";
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/first';

@Injectable()
export class PatientSearchService {

  constructor( private http: Http) {}
  
  search(term: string): Observable<Patient[]> {
    return this.http
              .get(`api/heroes/?name=${term}`)
              .map(response => response.json().data as Patient[])
  }
}
