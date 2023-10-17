#include <iostream>

void coub(double a, double b, double &a3, double &b3);

int main() {
	setlocale(LC_ALL, "rus");

	double a = 0, b = 0, a3 = 0, b3 = 0;

	std::cout << "\n������ ������ ����� a = ";
	std::cin >> a;
	std::cout << "\n������ ������ ����� b = ";
	std::cin >> b;

	coub(a, b, a3, b3);

	std::cout << "\n��� ������� ����� a^3 = " << a3;
	std::cout << "\n��� ������� ����� b^3 = " << b3 << std::endl;

	return 0;
}

void coub(double a, double b, double &a3, double &b3) {
	a3 = a*a*a;
	b3 = b*b*b;
}