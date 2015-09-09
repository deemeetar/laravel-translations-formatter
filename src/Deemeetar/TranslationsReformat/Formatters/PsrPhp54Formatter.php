<?php namespace Deemeetar\TranslationsReformat\Formatters;


class PSRPHP54Formatter implements Formatter
{
    const INDENT = '    ';
    const BEGINNING = "<?php\nreturn [\n";
    const END = "];";

    /**
     * @param array $input
     * @return string
     */
    public function format(array $input)
    {
        return self::BEGINNING . $this->_format($input, self::INDENT) . self::END;
    }


    /**
     * @param array $input
     * @return string
     */
    protected function _format(array $input, $indent)
    {
        $result = "";
        foreach ($input as $key => $value) {
            // Add indent for line
            $result .= "$indent";
            if (!is_null($key)) {
                // Add key
                $result .= "'$key' => ";
            }
            if (is_array($value)){
                $result.= "[\n";
                $result .= $this->_format($value, $indent.self::INDENT);
                $result.= "$indent],\n";
            } else {
                $result .= var_export($value, true);
                $result .= ",\n";
            }
        }
        return $result;
    }
}