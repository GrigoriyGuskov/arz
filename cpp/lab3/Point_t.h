#pragma once

class Point_t {
private:
	double x;
	double y;
	double z;
public:	
	Point_t();

	double get_x();
	double get_y();
	double get_z();
	void print();
	double length(Point_t &p2);

};